<?php

namespace JqlBuilder;

final class Field
{
    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-affectedVersionAffectedVersionAffectedversion
     */
    public const AFFECTED_VERSION = 'affectedVersion';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-ApprovalsApprovals
     */
    public const APPROVALS = 'approvals';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-AssigneeAssignee
     */
    public const ASSIGNEE = 'assignee';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-attachmentsAttachments
     */
    public const ATTACHMENTS = 'attachments';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-CategoryCategory
     */
    public const CATEGORY = 'category';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-requestChannelTypeChangegatingtype
     */
    public const CHANGE_GATING_TYPE = 'change-gating-type';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-CommentCommentsComment
     */
    public const COMMENT = 'comment';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-ComponentComponent
     */
    public const COMPONENT = 'component';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-CreatedCreatedDatecreatedDateCreated
     */
    public const CREATED = 'created';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-CreatorCreator
     */
    public const CREATOR = 'creator';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-CustomerRequestTypeCustomerRequestType
     */
    public const CUSTOMER_REQUEST_TYPE = '"Customer Request Type"';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-DescriptionDescription
     */
    public const DESCRIPTION = 'description';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-DueDueDatedueDateDue
     */
    public const DUE = 'due';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-EnvironmentEnvironment
     */
    public const ENVIRONMENT = 'environment';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-epic
     */
    public const EPIC_LINK = '"epic link"';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-filterFilter
     */
    public const FILTER = 'filter';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-FixVersionfixVersionFixversion
     */
    public const FIX_VERSION = 'fixVersion';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-IssueIssuekey
     */
    public const ISSUE_KEY = 'issueKey';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-issuelinkIssuelink
     */
    public const ISSUE_LINK = 'issueLink';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-issuelinktypeIssuelinktype
     */
    public const ISSUE_LINK_TYPE = 'issueLinkType';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-labelsLabels
     */
    public const LABELS = 'labels';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-LastViewedLastViewedDatelastViewedDateLastviewed
     */
    public const LAST_VIEWED = 'lastViewed';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-LevelLevel
     */
    public const LEVEL = 'level';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-organizationOrganization
     */
    public const ORGANIZATION = 'organizations';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-originalEstimateOriginalEstimateOriginalestimate
     */
    public const ORIGINAL_ESTIMATE = 'originalEstimate';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-ParentParent
     */
    public const PARENT = 'parent';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-PriorityPriority
     */
    public const PRIORITY = 'priority';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-ProjectProject
     */
    public const PROJECT = 'project';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-projectTypeProjecttype
     */
    public const PROJECT_TYPE = 'projectType';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-remainingEstimateRemainingEstimateRemainingestimate
     */
    public const REMAINING_ESTIMATE = 'remainingEstimate';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-ReporterReporter
     */
    public const REPORTER = 'reporter';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-requestChannelTypeRequestchanneltype
     */
    public const REQUEST_CHANNEL_TYPE = 'request-channel-type';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-requestLastActivityTimeRequestlastactivitytime
     */
    public const REQUEST_LAST_ACTIVITY_TIME = 'request-last-activity-time';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-ResolutionResolution
     */
    public const RESOLUTION = 'resolution';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-ResolvedResolutionDateresolutionDateResolved
     */
    public const RESOLVED = 'resolved';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-SprintSprint
     */
    public const SPRINT = 'sprint';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-StatusStatus
     */
    public const STATUS = 'status';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-SummarySummary
     */
    public const SUMMARY = 'summary';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-textTextText
     */
    public const TEXT = 'text';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-TimeSpenttimeSpentTimespent
     */
    public const TIME_SPENT = 'timeSpent';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-TypeType
     */
    public const TYPE = 'type';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-UpdatedUpdatedDateupdatedDateUpdated
     */
    public const UPDATED = 'updated';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-voterVoterVoter
     */
    public const VOTER = 'voter';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-VotesVotes
     */
    public const VOTES = 'votes';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-watcherWatcherWatcher
     */
    public const WATCHER = 'watcher';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-WatchersWatchers
     */
    public const WATCHERS = 'watchers';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-worklogCommentWorklogcomment
     */
    public const WORKLOG_COMMENT = 'worklogComment';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-worklogDateWorklogdate
     */
    public const WORKLOG_DATE = 'worklogDate';

    /**
     * @var string
     * @see https://support.atlassian.com/jira-software-cloud/docs/advanced-search-reference-jql-fields#Advancedsearchingfieldsreference-WorkRatioWorkratio
     */
    public const WORK_RATIO = 'workRatio';
}
