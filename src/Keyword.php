<?php

namespace JqlBuilder;

final class Keyword
{
    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-keywords/#Advancedsearchingkeywordsreference-ANDAND
     */
    public const AND = 'and';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-keywords/#Advancedsearchingkeywordsreference-OROR
     */
    public const OR = 'or';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-keywords/#Advancedsearchingkeywordsreference-NOTNOT
     */
    public const NOT = 'not';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-keywords/#Advancedsearchingkeywordsreference-EMPTYEMPTY
     */
    public const EMPTY = 'empty';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-keywords/#Advancedsearchingkeywordsreference-NULLNULL
     */
    public const NULL = 'null';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-keywords/#Advancedsearchingkeywordsreference-ORDER
     */
    public const ORDER_BY = 'order by';
}
