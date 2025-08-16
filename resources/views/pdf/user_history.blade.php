<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $user->name }} - DTR History & Payslip (Admin View)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        /* Page breaks - only ONE page break before page 2 */
        .page-1 {
            /* no forced break here */
        }

        .page-2 {
            page-break-before: always;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #3b82f6;
            padding-bottom: 20px;
        }

        .header h1 {
            color: #0547afff;
            margin: 0 0 10px 0;
            font-size: 30px;
        }

        .header p {
            margin: 5px 0;
            color: #666;
        }

        /* Admin note */
        .admin-note {
            background: #fef3c7;
            border: 1px solid #fde68a;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 11px;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #3b82f6;
            color: white;
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }

        td {
            padding: 8px 10px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background: #f8f9fa;
        }

        /* Colors */
        .date {
            color: #3b82f6;
            font-weight: bold;
        }

        .time-in {
            color: #059669;
            font-weight: bold;
        }

        .time-out {
            color: #dc2626;
            font-weight: bold;
        }

        .hours {
            color: #7c3aed;
            font-weight: bold;
        }

        /* Status */
        .status-badge {
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: bold;
        }

        .status-complete {
            background: #dcfce7;
            color: #166534;
        }

        .status-timein {
            background: #fef3c7;
            color: #92400e;
        }

        .status-norecord {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Payslip styles */
        .payslip-header {
           text-align: center;
            margin-bottom: 10px;
            border-bottom: 2px solid #3b82f6;
            padding-bottom: 10px;
        }

        .payslip-header h1 {
            color: #0547afff;
            margin: 0 0 10px 0;
            font-size: 30px;
        }

        .trainee-info {
            margin-bottom: 25px;
        }

        .info-table,
        .allowance-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table th,
        .info-table td,
        .allowance-table th,
        .allowance-table td {
            border: 1px solid #ddd;
            padding: 8px 12px;
            text-align: left;
            color: #000;

        }

        .info-table th,
        .allowance-table th {
            background: #f8f9fa;
            font-weight: bold;
            color: #000;
        }

        .info-table td {
            color: #000;
        }

        .allowance-summary {
            margin-bottom: 25px;
        }

        .allowance-summary h3 {
            margin: 0 0 10px 0;
            font-size: 14px;
            color: #000;
        }

        .total-allowance {
            text-align: right;
            font-size: 14px;
            font-weight: bold;
            margin: 15px 0;
            color: #000;
        }

        .acknowledgment {
            margin: 25px 0;
            font-size: 12px;
            line-height: 1.5;
        }

        .signature-section {
            margin-top: 30px;
        }

        .signature-line {
            border-bottom: 1px solid #333;
            width: 200px;
            display: inline-block;
            margin-left: 10px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
    </style>
</head>

<body>

    @php
    $dailyRate = 100;
    $requiredStart = \Carbon\Carbon::createFromTime(8, 0, 0);
    $totalAllowance = 0;
    $daysPresent = 0;

    // Filter DTRs by date range if provided and ensure ascending order
    $filteredDtrs = $dtrs;
    if (request('start_date') && request('end_date')) {
    $startDate = \Carbon\Carbon::parse(request('start_date'))->startOfDay();
    $endDate = \Carbon\Carbon::parse(request('end_date'))->endOfDay();
    $filteredDtrs = $dtrs->filter(function($dtr) use ($startDate, $endDate) {
    $dtrDate = \Carbon\Carbon::parse($dtr->time_in);
    return $dtrDate->between($startDate, $endDate);
    })->sortBy('time_in'); // Sort by time_in in ascending order
    } else {
    $filteredDtrs = $dtrs->sortBy('time_in'); // Sort by time_in in ascending order
    }

    foreach ($filteredDtrs as $dtr) {
    $hours = $dtr->diffInHours();
    $pay = 0;
    $lateDeduct = 0;
    $lateHours = 0;
    if ($hours > 0) {
    $daysPresent++;
    if ($hours >= 8) {
    $pay = $dailyRate;
    } elseif ($hours > 4) {
    $pay = ($hours / 8) * $dailyRate;
    } else {
    $pay = $dailyRate / 2;
    }
    // Late calculation
    if ($dtr->time_in) {
    $in = \Carbon\Carbon::parse($dtr->time_in);
    if ($in->gt($requiredStart)) {
    $lateHours = $in->diffInMinutes($requiredStart) / 60;
    if ($lateHours >= 1) {
    $lateDeduct = ($dailyRate / 8) * floor($lateHours);
    $pay -= $lateDeduct;
    }
    }
    }
    $totalAllowance += $pay;
    }
    }
    $daysWorked = $daysPresent;
    $allowance = $totalAllowance;
    @endphp

    {{-- DTR Page --}}
    <div class="page-1">
        <div class="header">
            <h1>LIMEHILLS</h1>
            <h2>Daily Time Record (DTR)</h2>
            <p><strong>Trainee Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Generated on:</strong> {{ now()->format('F d, Y \a\t h:i A') }}</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Hours Worked</th>
                    <th>Break Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($filteredDtrs as $dtr)
                <tr>
                    <td class="date">{{ $dtr->time_in ? \Carbon\Carbon::parse($dtr->time_in)->format('M d, Y') : '—' }}</td>
                    <td class="time-in">{{ $dtr->time_in ? \Carbon\Carbon::parse($dtr->time_in)->format('h:i:s A') : '—' }}</td>
                    <td class="time-out">{{ $dtr->time_out ? \Carbon\Carbon::parse($dtr->time_out)->format('h:i:s A') : '—' }}</td>
                    <td class="hours">
                        @if($dtr->time_in && $dtr->time_out)
                        {{ number_format($dtr->diffInHours(), 2) }} hrs
                        @else
                        —
                        @endif
                    </td>
                    <td>
                        @if($dtr->break_in && $dtr->break_out)
                        {{ \Carbon\Carbon::parse($dtr->break_in)->format('h:i A') }} -
                        {{ \Carbon\Carbon::parse($dtr->break_out)->format('h:i A') }}
                        @else
                        —
                        @endif
                    </td>
                    <td>
                        @if($dtr->time_in && $dtr->time_out)
                        <span class="status-badge status-complete">Complete</span>
                        @elseif($dtr->time_in && !$dtr->time_out)
                        <span class="status-badge status-timein">Time In Only</span>
                        @else
                        <span class="status-badge status-norecord">No Record</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>This document was automatically generated by the DTR System for administrative purposes</p>
            <p>Date: {{ now()->format('F d, Y \a\t h:i A') }}</p>
        </div>
    </div>

    {{-- Payslip Page --}}
    <div class="page-2">
        <div class="payslip-header">
            <h1>LIMEHILLS</h1>
            <h2>OJT PAYSLIP</h2>
        </div>

        <div class="trainee-info">
            <table class="info-table">
                <tr>
                    <th>Name of Trainee</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Payroll Period</th>
                    <td>
                        @if(request('start_date') && request('end_date'))
                        {{ \Carbon\Carbon::parse(request('start_date'))->format('M d, Y') }} - {{ \Carbon\Carbon::parse(request('end_date'))->format('M d, Y') }}
                        @else
                        {{ now()->format('F d, Y') }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Daily Allowance Rate</th>
                    <td>{{ number_format($dailyRate, 2) }}</td>
                </tr>
                <tr>
                    <th>Days Present</th>
                    <td>{{ $daysWorked }} Days</td>
                </tr>
            </table>
        </div>

        <div class="allowance-summary">
            <h3>Allowance Summary</h3>
            <table class="allowance-table">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>OJT Allowance</td>
                        <td>{{ $daysWorked }} Days</td>
                        <td>{{ number_format($dailyRate, 2) }}</td>
                        <td>{{ number_format($allowance, 2) }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="total-allowance">
                Total Allowance: {{ number_format($allowance, 2) }}
            </div>
        </div>

        <div class="acknowledgment">
            I acknowledge receipt of the above amount corresponding to the rendered OJT days for the stated period.
        </div>

        <div class="signature-section">
            <p>Trainee Signature: <span class="signature-line"></span></p>
            <p>Date: <span class="signature-line"></span></p>
        </div>

        <div class="footer">
            <p>Generated by: DTR System | Date: {{ now()->format('F d, Y \a\t h:i A') }}</p>
        </div>
    </div>

</body>

</html>