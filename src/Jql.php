<?php

declare(strict_types=1);

namespace JqlBuilder;

use Closure;
use InvalidArgumentException;
use Spatie\Macroable\Macroable;
use Stringable;

final class Jql implements Stringable
{
    use Macroable;

    private string $query = '';

    public function where(
        string|Closure $column,
        mixed $operator = Operator::EQUALS,
        mixed $value = null,
        string $boolean = Keyword::AND
    ): self {
        if ($column instanceof Closure) {
            return tap($this, function () use ($boolean, $column) {
                if (empty($this->query)) {
                    $queryTemplate = "(%s)";
                } else {
                    $queryTemplate = "$this->query $boolean (%s)";
                    $this->query = '';
                }

                $column($this);

                $this->query = sprintf($queryTemplate, $this->query);
            });
        }

        if (count(func_get_args()) === 2) {
            [$column, $operator, $value] = [$column, is_array($operator) ? Operator::IN : Operator::EQUALS, $operator];
        }

        $this->invalidBooleanOrOperator($boolean, $operator, $value);

        return tap($this, fn () => $this->appendQuery("$column $operator {$this->quote($operator, $value)}", $boolean));
    }

    public function orWhere(string|Closure $column, mixed $operator = Operator::EQUALS, mixed $value = null): self
    {
        if (count(func_get_args()) === 2) {
            [$column, $operator, $value] = [$column, is_array($operator) ? Operator::IN : Operator::EQUALS, $operator];
        }

        return tap($this, fn () => $this->where($column, $operator, $value, Keyword::OR));
    }

    public function when(mixed $value, callable $callback): self
    {
        $value = value($value, $this);

        if ($value) {
            return $callback($this, $value) ?: $this;
        }

        return $this;
    }

    public function whenNot(mixed $value, callable $callback): self
    {
        $value = value($value, $this);

        if (! $value) {
            return $callback($this, $value) ?: $this;
        }

        return $this;
    }

    public function orderBy(string $column, string $direction): self
    {
        return tap($this, fn () => $this->appendQuery(Keyword::ORDER_BY." $column $direction"));
    }

    public function rawQuery(string $query): self
    {
        return tap($this, fn () => $this->appendQuery($query));
    }

    public function getQuery(): string
    {
        return trim($this->query);
    }

    public function __toString(): string
    {
        return $this->getQuery();
    }

    private function quote(string $operator, mixed $value): string
    {
        if (in_array($operator, [Operator::IN, Operator::NOT_IN, Operator::WAS_IN, Operator::WAS_NOT_IN])) {
            $values = array_reduce(array_wrap($value), function ($prev, $current) {
                if ($prev === null) {
                    return '"'.str_replace('"', '\\"', $current).'"';
                }

                return $prev.', "'.str_replace('"', '\\"', $current).'"';
            });

            return "($values)";
        }

        $value = str_replace('"', '\\"', $value);

        return "\"$value\"";
    }

    private function appendQuery(string $query, string $boolean = ''): void
    {
        if (empty($this->query)) {
            $this->query = $query;
        } else {
            $this->query .= ' '.trim("$boolean $query");
        }
    }

    /**
     * @throws \InvalidArgumentException
     */
    private function invalidBooleanOrOperator(mixed $boolean, string $operator, mixed $value): void
    {
        if (! in_array($boolean, [Keyword::AND, Keyword::OR])) {
            throw new InvalidArgumentException(sprintf(
                'Illegal boolean [%s] value. only [%s, %s] is acceptable',
                $boolean,
                Keyword::AND,
                Keyword::OR
            ));
        }

        if (! in_array($operator, [Operator::IN, Operator::NOT_IN, Operator::WAS_IN, Operator::WAS_NOT_IN]) && is_array($value)) {
            throw new InvalidArgumentException(sprintf(
                'Illegal operator [%s] value. only [%s, %s, %s, %s] is acceptable when $value type is array',
                $operator,
                Operator::IN,
                Operator::NOT_IN,
                Operator::WAS_IN,
                Operator::WAS_NOT_IN,
            ));
        }
    }
}
