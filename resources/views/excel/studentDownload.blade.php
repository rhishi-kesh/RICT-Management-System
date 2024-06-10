<table>
    <thead>
    <tr>
        <th style="font-weight: bold">SL</th>
        <th style="font-weight: bold">Student ID</th>
        <th style="font-weight: bold">Name</th>
        <th style="font-weight: bold">Father Name</th>
        <th style="font-weight: bold">Mother Name</th>
        <th style="font-weight: bold">Mobile</th>
        <th style="font-weight: bold">Address</th>
        <th style="font-weight: bold">Email</th>
        <th style="font-weight: bold">Date Of Birth</th>
        <th style="font-weight: bold">Guardian Mobile No</th>
        <th style="font-weight: bold">Qualification</th>
        <th style="font-weight: bold">Profession</th>
        <th style="font-weight: bold">Course Name</th>
        <th style="font-weight: bold">Discount</th>
        <th style="font-weight: bold">Total Amount</th>
        <th style="font-weight: bold">Total Pay</th>
        <th style="font-weight: bold">Total Due</th>
        <th style="font-weight: bold">Payment Type</th>
        <th style="font-weight: bold">Payment Number</th>
        <th style="font-weight: bold">Batch Name</th>
        <th style="font-weight: bold">Gender</th>
        <th style="font-weight: bold">Class Day</th>
        <th style="font-weight: bold">Admission Fee</th>
        <th style="font-weight: bold">Student Status</th>
        <th style="font-weight: bold">Is_Certificate?</th>
        <th style="font-weight: bold">Admission</th>
        <th style="font-weight: bold">Admission Date</th>
    </tr>
    </thead>
    <tbody>
    @php $i = 1 @endphp
    @foreach($students as $item)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $item->student_id ?? '' }}</td>
            <td>{{ $item->name ?? '' }}</td>
            <td>{{ $item->fName ?? '' }}</td>
            <td>{{ $item->mName ?? '' }}</td>
            <td>{{ $item->mobile ?? '' }}</td>
            <td>{{ $item->address ?? '' }}</td>
            <td>{{ $item->email ?? '' }}</td>
            <td>{{ $item->dateofbirth ?? '' }}</td>
            <td>{{ $item->guardianMobileNo ?? '' }}</td>
            <td>{{ $item->qualification ?? '' }}</td>
            <td>{{ $item->profession ?? '' }}</td>
            <td>{{ $item->course->name ?? '' }}</td>
            <td>{{ $item->discount ?? '' }}</td>
            <td>{{ $item->total ?? '' }}</td>
            <td>{{ $item->pay ?? '' }}</td>
            <td>{{ $item->due ?? '' }}</td>
            <td>{{ $item->pament_mode->name ?? '' }}</td>
            <td>{{ $item->paymentNumber ?? '' }}</td>
            <td>{{ $item->batch->name ?? '' }}</td>
            <td>{{ $item->gender ?? '' }}</td>
            <td>{{ $item->class_days ?? '' }}</td>
            <td>@if($item->admissionFee == 0) No @else Yes @endif</td>
            <td>{{ ucfirst($item->student_status ?? '') }}</td>
            <td>{{ ucfirst($item->is_certificate ?? '') }}</td>
            <td>@if($item->is_fromSite == 0) Physical @else Website @endif</td>
            <td>{{ date("d-M-Y", strtotime($item->created_at ?? '')) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
