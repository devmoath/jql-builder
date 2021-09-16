<?php

declare(strict_types=1);

namespace DevMoath\JqlBuilder;

class Jql implements \Stringable
{
    public const EQUAL = '=';

    public const NOT_EQUAL = '!=';

    public const GREATER_THAN = '>';

    public const LOWER_THAN = '<';

    public const GREATER_THAN_OR_EQUAL = '>=';

    public const LOWER_THAN_OR_EQUAL = '<=';

    public const LIKE = '~';

    public const NOT_LIKE = '!~';

    public const IN = 'in';

    public const NOT_IN = 'not in';

    public const IS = 'is';

    public const IS_NOT = 'is not';

    public const AND = 'AND';

    public const WAS = 'was';

    public const WAS_NOT = 'was not';

    public const WAS_IN = 'was in';

    public const WAS_NOT_IN = 'was not in';

    public const CHANGED = 'changed';

    public const ORDER_BY = 'order by';

    public const DESC = 'desc';

    public const ASC = 'asc';

    private string $project = '';

    private string $type = '';

    private string $issueType = '';

    private array $custom = [];

    private string $status = '';

    public static function query(): self
    {
        return new self();
    }

    public function whereProject(string|int $value, string $operator = self::EQUAL): self
    {
        $this->project = "project $operator '$value'";

        return $this;
    }

    public function whereType(string|int $value, string $operator = self::EQUAL): self
    {
        $this->type = "type $operator '$value'";

        return $this;
    }

    public function whereIssueType(string|int $value, string $operator = self::EQUAL): self
    {
        $this->issueType = "issuetype $operator '$value'";

        return $this;
    }

    public function whereCustom(string $name, string|int $value, string $operator = self::LIKE): self
    {
        $this->custom[] = "'$name' $operator '$value'";

        return $this;
    }

    public function whereStatus(array|string $value, string $operator = self::IN): self
    {
        $values = implode("', '", is_array($value) ? $value : [$value]);

        $this->status = "status $operator ('$values')";

        return $this;
    }

    public function when(mixed $value, callable $callback): self
    {
        if ($value) {
            return $callback($this, $value);
        }

        return $this;
    }

    public function whenNot(mixed $value, callable $callback): self
    {
        if (! $value) {
            return $callback($this, $value);
        }

        return $this;
    }

    public function __toString(): string
    {
        return trim(
            implode(
                ' '.self::AND.' ',
                array_filter([
                    $this->project,
                    $this->type,
                    $this->issueType,
                    $this->status,
                    ...$this->custom,
                ])
            )
        );
    }
}
