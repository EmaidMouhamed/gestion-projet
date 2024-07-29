<?php

namespace App\Enums;

enum Prioritee: string
{
    case HAUTE = 'haute';
    case NORMAL = 'normal';
    case FAIBLE = 'faible';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function getLabels(): array
    {
        return [
            self::HAUTE->value => 'Haute',
            self::NORMAL->value => 'Normal',
            self::FAIBLE->value => 'Faible',

        ];
    }

    public function badgeClass(): string
    {
        return match ($this) {
            self::HAUTE => 'bg-danger',
            self::NORMAL => 'bg-warning',
            self::FAIBLE => 'bg-info',
        };
    }
}
