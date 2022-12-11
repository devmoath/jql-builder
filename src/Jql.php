<?php

declare(strict_types=1);

namespace JqlBuilder;

use Closure;
use Stringable;

final class Jql implements Stringable
{
    private string $query = '';

    public function where(
        string|Closure $column,
        mixed $operator = Operator::EQUALS,
        mixed $value = null,
        string $boolean = Keyword::AND
    ): self {
        if ($column instanceof Closure) {
            if ($this->getQuery() === '') {
                $queryTemplate = '(%s)';
            } else {
                $queryTemplate = "$this->query $boolean (%s)";
                $this->query = '';
            }

            $column($this);

            $this->query = sprintf($queryTemplate, $this->query);

            return $this;
        }

        if (func_num_args() === 2) {
            $value = $operator;
            $operator = is_array($operator) ? Operator::IN : Operator::EQUALS;
        }

        /**
         * @var string $column
         * @var string $operator
         */
        $this->appendQuery("{$this->escapeSpaces($column)} $operator {$this->quote($operator, $value)}", $boolean);

        return $this;
    }

    public function orWhere(string|Closure $column, mixed $operator = Operator::EQUALS, mixed $value = null): self
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = is_array($operator) ? Operator::IN : Operator::EQUALS;
        }

        $this->where($column, $operator, $value, Keyword::OR);

        return $this;
    }

    public function when(mixed $value, callable $callback): self
    {
        $value = $value instanceof Closure ? $value($this) : $value;

        if ($value) {
            return $callback($this, $value) ?? $this;
        }

        return $this;
    }

    public function whenNot(mixed $value, callable $callback): self
    {
        $value = $value instanceof Closure ? $value($this) : $value;

        if (! $value) {
            return $callback($this, $value) ?? $this;
        }

        return $this;
    }

    public function orderBy(string $column, string $direction): self
    {
        $this->appendQuery(Keyword::ORDER_BY." {$this->escapeSpaces($column)} $direction");

        return $this;
    }

    public function rawQuery(string $query): self
    {
        $this->appendQuery($query);

        return $this;
    }

    public function getQuery(): string
    {
        return trim($this->query);
    }

    public function __toString(): string
    {
        return $this->getQuery();
    }

    private function escapeSpaces(string $column): string
    {
        if (! str_contains($column, ' ')) {
            return $column;
        }

        return "\"$column\"";
    }

    private function quote(string $operator, mixed $value): string
    {
        if (in_array($operator, [Operator::IN, Operator::NOT_IN, Operator::WAS_IN, Operator::WAS_NOT_IN], true)) {
            $values = array_reduce(
                is_array($value) ? $value : [$value],
                static function ($prev, $current): string {
                    if ($prev === null) {
                        return '"'.str_replace('"', '\\"', $current).'"';
                    }

                    return $prev.', "'.str_replace('"', '\\"', $current).'"';
                }
            );

            return "($values)";
        }

        /** @var string|int $value */
        $escapedValue = str_replace('"', '\\"', (string) $value);

        return "\"$escapedValue\"";
    }

    private function appendQuery(string $query, string $boolean = ''): void
    {
        if ($this->getQuery() === '') {
            $this->query = $query;
        } else {
            $this->query .= ' '.trim("$boolean $query");
        }
    }
}
