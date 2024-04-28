<tr>
    <th id="complaint_th">Complaint id</th>
    <th id="date_th">Date & Time</th>
    <th id="status_th">Status</th>
    <th id="admin_th">Admin Id</th>
    <th id="comment_th">Comment</th>
</tr>
<?php
foreach ($assist as $row) {
    echo "<tr>";
    echo "<td>" . $row->comp_id . "</td>";
    echo "<td>" . $row->created_at . "</td>";
    echo "<td>" . $row->status . "</td>";
    echo "<td>" . $row->admin_user_id . "</td>";
    echo "<td>" . $row->comment . "</td>";
    echo "</tr>";
}
?>