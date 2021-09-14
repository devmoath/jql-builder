<?php

namespace DevMoath\JqlBuilder\Tests;

use DevMoath\JqlBuilder\Jql;
use PHPUnit\Framework\TestCase;

class JqlTest extends TestCase
{
    /** @test */
    public function it_can_generate_jql(): void
    {
        $testcase = (string) Jql::query()->whereProject('MY PROJECT');
        $testcase2 = (string) Jql::query()->whereProject('MY PROJECT')->whereStatus(['wip', 'created']);

        $this->assertSame("project = 'MY PROJECT'", $testcase);
        $this->assertSame("project = 'MY PROJECT' AND status in ('wip', 'created')", $testcase2);
    }
}
