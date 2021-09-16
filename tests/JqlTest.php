<?php

namespace DevMoath\JqlBuilder\Tests;

use DevMoath\JqlBuilder\Jql;
use PHPUnit\Framework\TestCase;

class JqlTest extends TestCase
{
    /** @test */
    public function it_can_generate_simple_jql(): void
    {
        $testcase = (string) Jql::query()->whereProject('MY PROJECT');
        $testcase2 = (string) Jql::query()->whereProject('MY PROJECT')->whereStatus(['wip', 'created']);

        $this->assertSame("project = 'MY PROJECT'", $testcase);
        $this->assertSame("project = 'MY PROJECT' AND status in ('wip', 'created')", $testcase2);
    }

    /** @test */
    public function it_can_generate_simple_jql_using_condition(): void
    {
        $projectName = 'MY PROJECT';
        $emptyProjectName = '';

        $testcase = (string) Jql::query()->when($projectName, function (Jql $builder, $value) {
            return $builder->whereProject($value);
        });
        $testcase2 = (string) Jql::query()->when($emptyProjectName, function (Jql $builder, $value) {
            return $builder->whereProject($value);
        });

        $this->assertSame("project = 'MY PROJECT'", $testcase);
        $this->assertSame("", $testcase2);
    }
}
