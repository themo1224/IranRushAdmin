<?php
namespace App\Enums;

enum AssetStatus: string {
    case Pending = 'در انتظار بررسی';
    case Approved = 'تایید شده';
    case Rejected = 'رد شده';
}
