<?php

namespace JqlBuilder;

/**
 * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators
 */
final class Operator
{
    public const EQUALS = '=';

    public const NOT_EQUALS = '!=';

    public const GREATER_THAN = '>';

    public const GREATER_THAN_EQUALS = '>=';

    public const LESS_THAN = '<';

    public const LESS_THAN_EQUALS = '<=';

    public const IN = 'in';

    public const NOT_IN = 'not in';

    public const CONTAINS = '~';

    public const DOES_NOT_CONTAIN = '!~';

    public const IS = 'is';

    public const IS_NOT = 'is not';

    public const WAS = 'was';

    public const WAS_IN = 'was in';

    public const WAS_NOT_IN = 'was not in';

    public const WAS_NOT = 'was not';

    public const CHANGED = 'changed';

    /**
     * @return string[]
     */
    public static function acceptList(): array
    {
        return [
            self::IN,
            self::NOT_IN,
            self::WAS_IN,
            self::WAS_NOT_IN,
        ];
    }
}
