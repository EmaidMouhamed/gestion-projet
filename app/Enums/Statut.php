<?php

namespace App\Enums;

enum Statut: string
{
    case A_VENIR = 'a_venir';
    case EN_COURS = 'en_cours';
    case TERMINE = 'terminé';
    case ARCHIVE = 'archivé';
    case EN_RETARD = 'en_retard';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function getLabels(): array
    {
        return [
            self::A_VENIR->value => 'A venir',
            self::EN_COURS->value => 'En cours',
            self::TERMINE->value => 'Terminé',
            self::ARCHIVE->value => 'Archivé',
            self::EN_RETARD->value => 'En retard',
        ];
    }

    public function badgeClass(): string
    {
        return match ($this) {
            self::A_VENIR => 'bg-primary',
            self::EN_COURS => 'bg-warning',
            self::TERMINE => 'bg-success',
            self::ARCHIVE => 'bg-secondary',
            self::EN_RETARD => 'bg-danger',
        };
    }
}
