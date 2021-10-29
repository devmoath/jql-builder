<?php

namespace DevMoath\JqlBuilder\Tests;

use DevMoath\JqlBuilder\Jql;
use PHPUnit\Framework\TestCase;

class JqlTest extends TestCase
{
    /** @test */
    public function it_can_generate_query_with_single_condition(): void
    {
        $query = Jql::query()
            ->whereProject('MY PROJECT')
            ->getQuery();

        self::assertSame("project = 'MY PROJECT'", $query);
    }

    /** @test */
    public function it_can_generate_query_with_many_conditions(): void
    {
        $query = Jql::query()
            ->whereProject('MY PROJECT')
            ->whereIssueType('support')
            ->whereStatus(['wip', 'created'], Jql::IN)
            ->getQuery();

        self::assertSame("project = 'MY PROJECT' and issuetype = 'support' and status in ('wip', 'created')", $query);
    }

    /** @test */
    public function it_can_generate_query_with_custom_filed_conditions(): void
    {
        $query = Jql::query()
            ->where('customfild_111', Jql::EQUAL, 'value')
            ->where('customfild_222', Jql::EQUAL, 'value')
            ->getQuery();

        self::assertSame("customfild_111 = 'value' and customfild_222 = 'value'", $query);
    }

    /** @test */
    public function it_can_generate_query_conditions_based_on_your_condition(): void
    {
        $query = Jql::query()
            ->when('MY PROJECT', fn(Jql $builder, $value) => $builder->whereProject($value))
            ->when(fn(Jql $builder) => false, fn(Jql $builder, $value) => $builder->whereIssueType($value))
            ->getQuery();

        self::assertSame("project = 'MY PROJECT'", $query);
    }

    /** @test */
    public function it_can_add_macro(): void
    {
        $builder = new Jql();

        $builder::macro('whereCustom', function($value) {
            /** @var Jql $this */
            return $this->where('custom', Jql::EQUAL, $value);
        });

        /** @noinspection PhpUndefinedMethodInspection */
        $query = $builder->whereCustom('1')->getQuery();

        self::assertSame("custom = '1'", $query);
    }
}
