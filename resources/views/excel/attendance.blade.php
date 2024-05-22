<table>
    <thead>
    <tr>
        <th style="font-weight: bold">SL</th>
        <th style="font-weight: bold">Name</th>
        <th style="font-weight: bold">Attendance</th>
        <th style="font-weight: bold">Date</th>
    </tr>
    </thead>
    <tbody>
    @php $i = 1 @endphp
    @foreach($attendances as $item)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $item->students->name }}</td>
            <td>{{ $item->attendance }}</td>
            <td>{{ $item->date }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
