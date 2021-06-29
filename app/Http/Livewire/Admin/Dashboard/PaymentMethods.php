<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Paymentmethod;
use Livewire\Component;

class PaymentMethods extends Component
{
    public $title,$payments,$addPayment,$editable;
    public $paymentTitle,$paymentContent;
    public function mount()
    {
        $this->title = 'Payment Methods';
        $this->addPayment = false;
        $this->editable = null;
    }
    public function toggleAddPayment()
    {
        if($this->addPayment)
        $this->addPayment = false;
        else
        $this->addPayment = true;
    }
    public function addPayment()
    {
        $this->validate([
            'paymentTitle' => 'required',
            'paymentContent' => ''
        ]);
        Paymentmethod::create([
            'title' => $this->paymentTitle,
            'content' => $this->paymentContent
        ]);
        $this->reset('paymentTitle','paymentContent');
        $this->toggleAddPayment();
    }
    public function editPayment($payId)
    {
        $payment = Paymentmethod::find($payId);
        $this->paymentTitle = $payment->title;
        $this->paymentContent = $payment->content;
        $this->editable = $payId;
    }
    public function confirmEditPayment()
    {
        Paymentmethod::find($this->editable)->update([
            'title' => $this->paymentTitle,
            'content' => $this->paymentContent
        ]);
        $this->editable = null;
        $this->reset('paymentTitle','paymentContent');
    }
    public function removePayment($payId)
    {
        Paymentmethod::find($payId)->delete();
    }
    public function toggleStatus($payId,$status)
    {
        if(!$status)
        {
            Paymentmethod::find($payId)->update([
                'status' => true
            ]);
        }
        else
        {
            Paymentmethod::find($payId)->update([
                'status' => false
            ]);
        }
    }
    public function render()
    {
        $this->payments = Paymentmethod::orderBy('id','DESC')->with('orders')->get();
        return view('livewire.admin.dashboard.payment-methods');
    }
}
