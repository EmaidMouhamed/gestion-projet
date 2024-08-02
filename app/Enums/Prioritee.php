<?php

namespace App\Enums;

enum Prioritee: string
{
    case FAIBLE = 'faible';
    case NORMAL = 'normal';
    case HAUTE = 'haute';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function getLabels(): array
    {
        return [
            self::FAIBLE->value => 'Faible',
            self::NORMAL->value => 'Normal',
            self::HAUTE->value => 'Haute',

        ];
    }

    public function badgeClass(): string
    {
        return match ($this) {
            self::FAIBLE => 'bg-info',
            self::NORMAL => 'bg-warning',
            self::HAUTE => 'bg-danger',
        };
    }
}
