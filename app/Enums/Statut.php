<?php

namespace App\Enums;

enum Statut: string
{
    case NOUVEAU = 'nouveau';
    case EN_COURS = 'en_cours';
    case TERMINE = 'terminé';
    case ARCHIVE = 'archivé';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function getLabels(): array
    {
        return [
            self::NOUVEAU->value => 'Nouveau',
            self::EN_COURS->value => 'En cours',
            self::TERMINE->value => 'Terminé',
            self::ARCHIVE->value => 'Archivé',
        ];
    }

    public function badgeClass(): string
    {
        return match ($this) {
            self::NOUVEAU => 'bg-primary',
            self::EN_COURS => 'bg-warning',
            self::TERMINE => 'bg-success',
            self::ARCHIVE => 'bg-secondary',
        };
    }
}
