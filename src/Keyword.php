<?php

namespace JqlBuilder;

/**
 * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-keywords
 */
final class Keyword
{
    public const AND = 'and';

    public const OR = 'or';

    public const NOT = 'not';

    public const EMPTY = 'empty';

    public const NULL = 'null';

    public const ORDER_BY = 'order by';

    /**
     * @return string[]
     */
    public static function booleans(): array
    {
        return [
            self::AND,
            self::OR,
        ];
    }
}
