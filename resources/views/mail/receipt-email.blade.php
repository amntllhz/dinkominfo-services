<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email Receipt</title>
</head>
<body>
    <h1>Receipt</h1>
    <p>Thank you for your purchase!</p>
    <p>Here are the details of your receipt:</p>
    
    <table>
        <thead>
            <tr>
                <th>Nama Pemohon</th>
                <th>Layanan</th>
                <th>Resi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $data['name'] }}</td>
                <td>{{ $data['service'] }}</td>
                <td>{{ $data['receipt'] }}</td>
                <td>{{ $data['status'] }}</td>
            </tr>
        </tbody>
    </table>
    
    <p>Thank you for choosing our service!</p>
</body>
</html>