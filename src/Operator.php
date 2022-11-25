<?php

namespace JqlBuilder;

final class Operator
{
    /**
     * @var string
     *
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators/#Advancedsearchingoperatorsreference-EQUALSEQUALS--
     */
    public const EQUALS = '=';

    /**
     * @var string
     *
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators/#Advancedsearchingoperatorsreference-NOT
     */
    public const NOT_EQUALS = '!=';

    /**
     * @var string
     *
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators/#Advancedsearchingoperatorsreference-GREATER
     */
    public const GREATER_THAN = '>';

    /**
     * @var string
     *
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators/#Advancedsearchingoperatorsreference-GREATER
     */
    public const GREATER_THAN_EQUALS = '>=';

    /**
     * @var string
     *
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators/#Advancedsearchingoperatorsreference-LESS
     */
    public const LESS_THAN = '<';

    /**
     * @var string
     *
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators/#Advancedsearchingoperatorsreference-LESS
     */
    public const LESS_THAN_EQUALS = '<=';

    /**
     * @var string
     *
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators/#Advancedsearchingoperatorsreference-ININ
     */
    public const IN = 'in';

    /**
     * @var string
     *
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators/#Advancedsearchingoperatorsreference-NOT
     */
    public const NOT_IN = 'not in';

    /**
     * @var string
     *
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators/#Advancedsearchingoperatorsreference-CONTAINS-CONTAINS--
     */
    public const CONTAINS = '~';

    /**
     * @var string
     *
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators/#Advancedsearchingoperatorsreference-DOES
     */
    public const DOES_NOT_CONTAIN = '!~';

    /**
     * @var string
     *
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators/#Advancedsearchingoperatorsreference-ISIS
     */
    public const IS = 'is';

    /**
     * @var string
     *
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators/#Advancedsearchingoperatorsreference-IS
     */
    public const IS_NOT = 'is not';

    /**
     * @var string
     *
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators/#Advancedsearchingoperatorsreference-WASWAS
     */
    public const WAS = 'was';

    /**
     * @var string
     *
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators/#Advancedsearchingoperatorsreference-WAS
     */
    public const WAS_IN = 'was in';

    /**
     * @var string
     *
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators/#Advancedsearchingoperatorsreference-WAS
     */
    public const WAS_NOT_IN = 'was not in';

    /**
     * @var string
     *
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators/#Advancedsearchingoperatorsreference-WAS
     */
    public const WAS_NOT = 'was not';

    /**
     * @var string
     *
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-operators/#Advancedsearchingoperatorsreference-CHANGEDCHANGED
     */
    public const CHANGED = 'changed';
}
