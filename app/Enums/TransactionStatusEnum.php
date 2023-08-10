<?php

declare(strict_types=1);

namespace App\Enums;

enum TransactionStatusEnum: int
{
    case CREATED = 1;
    case PENDING = 2;
    case CANCELED = 3;
    case PAID = 4;
    case CONFIRMED = 5;

    public function getTranslateName(): string
    {
        return match ($this) {
            self::CREATED => 'Criado',
            self::PENDING => 'Pendente',
            self::CANCELED => 'Cancelado',
            self::CONFIRMED => 'Confirmado',
            self::PAID => 'Pago',
        };
    }

    public static function getById(int $id): TransactionStatusEnum
    {
        return match ($id) {
            1 => self::CREATED,
            2 => self::PENDING,
            3 => self::CANCELED,
            4 => self::PAID,
            5 => self::CONFIRMED,
            default => throw new \InvalidArgumentException('Invalid transaction status ID.')
        };
    }

    public static function getByName(string $name): TransactionStatusEnum
    {
        $name = strtoupper($name);

        return match ($name) {
            self::CREATED->name => self::CREATED,
            self::PENDING->name => self::PENDING,
            self::CANCELED->name => self::CANCELED,
            self::PAID->name => self::PAID,
            self::CONFIRMED->name => self::CONFIRMED,
            default => throw new \InvalidArgumentException('Invalid transaction status ID.')
        };
    }
}
