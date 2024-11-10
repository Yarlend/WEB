<?php

class BankAccount implements AccountInterface
{
    // Константа мінімального балансу
    const MIN_BALANCE = 0;

    // Властивості класу
    protected float $balance;
    protected string $currency;

    // Конструктор класу
    public function __construct(float $balance, string $currency)
    {
        if ($balance < self::MIN_BALANCE) {
            throw new Exception("Початковий баланс не може бути менше " . self::MIN_BALANCE);
        }
        $this->balance = $balance;
        $this->currency = $currency;
    }

    // Метод для поповнення рахунку
    public function deposit(float $amount): void
    {
        if ($amount <= 0) {
            throw new Exception("Сума для поповнення повинна бути додатною.");
        }
        $this->balance += $amount;
    }

    // Метод для зняття коштів з рахунку
    public function withdraw(float $amount): void
    {
        if ($amount <= 0) {
            throw new Exception("Сума для зняття повинна бути додатною.");
        }
        if ($amount > $this->balance) {
            throw new Exception("Недостатньо коштів.");
        }
        $this->balance -= $amount;
    }

    // Метод для отримання поточного балансу
    public function getBalance(): float
    {
        return $this->balance;
    }
}
?>