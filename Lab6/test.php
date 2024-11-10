<?php

// Підключення файлів
require_once 'interface.php';
require_once 'account.php';
require_once 'savings.php';

try {
    echo "<h2>Основний рахунок</h2>";

    // Створення основного банківського рахунку
    $account1 = new BankAccount(0, 'USD');
    echo "<p><strong>Початковий баланс:</strong> " . $account1->getBalance() . " USD</p>";

    // Поповнення рахунку
    $amountToDeposit = 50;
    $account1->deposit($amountToDeposit);
    echo "<p><strong>Сума поповнення: </strong>" .  $amountToDeposit . " USD</p>";
    echo "<p><strong>Баланс після поповнення:</strong> " . $account1->getBalance() . " USD</p>";

    // Знаття коштів
    $amountToWithdraw = 30;
    $account1->withdraw($amountToWithdraw);
    echo "<p><strong>Сума знаття:</strong> " . $amountToWithdraw . " USD</p> ";
    echo "<p><strong>Баланс після зняття:</strong> " . $account1->getBalance() . " USD</p>";

    // Обробка винятку для недостатніх коштів
    try {
        $account1->withdraw(200);
    } catch (Exception $e) {
        echo "<p style='color: red;'><strong>Помилка:</strong> " . $e->getMessage() . "</p>";
    }

    echo "<h2>Накопичувальний рахунок</h2>";

    // Створення накопичувального рахунку
    $savingsAccount = new SavingsAccount(200, 'USD');
    $savingsAccount->deposit(100);
    echo "<p><strong>Баланс після поповнення:</strong> " . $savingsAccount->getBalance() . " USD</p>";

    $savingsAccount->applyInterest();
    echo "<p><strong>Баланс після застосування відсотків:</strong> " . $savingsAccount->getBalance() . " USD</p>";

    // Обробка винятку для негативної суми
    try {
        $savingsAccount->withdraw(-50);
    } catch (Exception $e) {
        echo "<p style='color: red;'><strong>Помилка:</strong> " . $e->getMessage() . "</p>";
    }

} catch (Exception $e) {
    echo "<p style='color: red;'><strong>Помилка:</strong> " . $e->getMessage() . "</p>";
}
