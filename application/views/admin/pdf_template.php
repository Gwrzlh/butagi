<!DOCTYPE html>
<html>
<head>
    <title>Guest Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Guest Data Report</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Purpose</th>
                <th>Room</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($guests)): ?>
                <?php foreach ($guests as $index => $guest): ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td><?= $guest['name']; ?></td>
                        <td><?= $guest['phone']; ?></td>
                        <td><?= $guest['purpose']; ?></td>
                        <td><?= $guest['room_name']; ?></td>
                        <td><?= $guest['visit_date']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No data available</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
