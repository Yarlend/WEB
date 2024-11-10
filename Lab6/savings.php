<?php

class SavingsAccount extends BankAccount
{
    // Статична властивість для відсоткової ставки
    public static float $interestRate = 0.05; // наприклад, 5%

    // Метод для застосування відсоткової ставки
    public function applyInterest(): void
    {
        $this->balance += $this->balance * self::$interestRate;
    }
}
?>