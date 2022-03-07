<?php

namespace JqlBuilder\Tests;

use InvalidArgumentException;
use JqlBuilder\Jql;
use PHPUnit\Framework\TestCase;

class JqlTest extends TestCase
{
    /** @test */
    public function it_can_generate_query(): void
    {
        $builder = new Jql();

        $query = $builder->where('project', '=', 'MY PROJECT')->getQuery();

        $expected = 'project = "MY PROJECT"';

        self::assertSame($expected, $query);

        $builder = new Jql();

        $query = $builder->where('project', '=', 'MY PROJECT')
            ->where('status', 'in', ['New', 'Done'])
            ->orWhere('summary', '~', 'sub-issue for "TES-xxx"')
            ->orWhere('labels', '=', 'support')
            ->when(false, fn (Jql $builder, mixed $value) => $builder->where('creator', '=', 'admin'))
            ->when(true, fn (Jql $builder, mixed $value) => $builder->where('creator', '=', 'guest'))
            ->orderBy('created', 'asc')
            ->getQuery();

        $expected = 'project = "MY PROJECT" and status in ("New", "Done") or summary ~ "sub-issue for \"TES-xxx\"" or labels = "support" and creator = "guest" order by created asc';

        self::assertSame($expected, $query);
    }

    /** @test */
    public function it_can_generate_query_with_grouped_conditions(): void
    {
        $actualQueries = [
            (new Jql())->where('creator', '=', '1646667083862@mailinator.com')
                ->where(function (Jql $builder) {
                    $builder->where('project', '=', 'A')
                        ->where('status', '=', '"Closed"');
                })
                ->orWhere(function (Jql $builder) {
                    $builder->where('project', '=', '"B"')
                        ->where('status', '!=', 'Closed');
                })->getQuery(),
            (new Jql())->where(function (Jql $builder) {
                $builder->where('project', '=', 'A')
                    ->where('status', '=', 'Closed');
            })->orWhere(function (Jql $builder) {
                $builder->where('project', '=', 'B')
                    ->where('status', '!=', 'Closed');
            })->getQuery(),
        ];

        $expectedQueries = [
            'creator = "1646667083862@mailinator.com" and (project = "A" and status = "\"Closed\"") or (project = "\"B\"" and status != "Closed")',
            '(project = "A" and status = "Closed") or (project = "B" and status != "Closed")',
        ];

        $this->assertEquals($expectedQueries, $actualQueries);
    }

    /** @test */
    public function it_can_add_macro(): void
    {
        $builder = new Jql();

        $builder::macro('whereCustom', function (mixed $value) {
            /** @var Jql $this */
            return $this->where('custom', '=', $value);
        });

        /** @noinspection PhpUndefinedMethodInspection */
        $query = $builder->whereCustom('1')->getQuery();

        self::assertSame('custom = "1"', $query);
    }

    /** @test */
    public function it_will_throw_exception_when_invalid_boolean_passed(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Illegal boolean [=] value. only [and, or] is acceptable');
        $this->expectExceptionCode(0);

        (new Jql())->where('project', '=', 'MY PROJECT', '=');
    }

    /** @test */
    public function it_will_throw_exception_when_invalid_operator_passed(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Illegal operator [=] value. only [in, not in, was in, was not in] is acceptable when $value type is array');
        $this->expectExceptionCode(0);

        (new Jql())->where('project', '=', ['MY PROJECT']);
    }
}
