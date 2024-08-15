<?php

namespace App\Controllers;

use App\Models\Balance;
use App\Models\Transaction;
use App\Models\User;

class TransactionController
{
    private Balance $balanceModel;
    private Transaction $transactionModel;
    public function __construct() {
        $this->balanceModel = new Balance();
        $this->transactionModel = new Transaction();
    }
    public function deposit(): void
    {
        $balance = $this->balanceModel->findOne('user_id',$_SESSION['user_id'])['amount'] ?? 0;

        $newBalance = (float)$balance + (float)$_POST['amount'];

        $this->transactionModel->create([
           'from_user_id' => $_SESSION['user_id'],
            'to_user_id' => $_SESSION['user_id'],
            'amount' => (float)$_POST['amount'],
            'remarks' => 'Deposited'
        ]);

        $this->balanceModel->updateOrCreate([
            'user_id' => $_SESSION['user_id'],
        ],[
            'amount' => $newBalance,
        ]);

        header('Location: /dashboard');
    }


    public function withdraw(): void
    {
        $balance = $this->balanceModel->findOne('user_id',$_SESSION['user_id'])['amount'] ?? 0;

        $newBalance = (float)$balance - (float)$_POST['amount'];

        $this->transactionModel->create([
            'from_user_id' => $_SESSION['user_id'],
            'to_user_id' => $_SESSION['user_id'],
            'amount' => (float)$_POST['amount'],
            'remarks' => 'Withdrawn'
        ]);

        $this->balanceModel->updateOrCreate([
            'user_id' => $_SESSION['user_id'],
        ],[
            'amount' => $newBalance,
        ]);

        header('Location: /dashboard');
    }

    public function transfer(): void {
        $recipientEmail = $_POST['email'];
        $amount = $_POST['amount'];

        $recipient = (new User())->findOne('email',$recipientEmail);

        if(!$recipient) {
            header('Location: /dashboard');
            die();
        }

        $from_user_id = $_SESSION['user_id'];
        $to_user_id = $recipient['id'];

        $senderBalance = $this->balanceModel->findOne('user_id',$from_user_id)['amount'] ?? 0;
        $receiverBalance = $this->balanceModel->findOne('user_id',$to_user_id)['amount'] ?? 0;

        if($senderBalance < $amount) {
            header('Location: /dashboard');
            die();
        }

        $this->transactionModel->create([
            'from_user_id' => $from_user_id,
            'to_user_id' => $to_user_id,
            'amount' => (float)$_POST['amount'],
            'remarks' => 'Transferred to '.$recipient['email']
        ]);

        $this->balanceModel->updateOrCreate([
            'user_id' => $from_user_id,
        ],[
            'amount' => $senderBalance - $amount,
        ]);

        $this->balanceModel->updateOrCreate([
            'user_id' => $to_user_id,
        ],[
            'amount' => $receiverBalance + $amount,
        ]);

        header('Location: /dashboard');
    }
}