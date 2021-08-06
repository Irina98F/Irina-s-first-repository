<?php

class TableLines
{
    //output

    public function write(PDOStatement $rows)
    {
        foreach ($rows as $row)
        {
            echo
            "<tr>
                <td>" . $row['id']. "</td>".
                "<td>" . $row['movie_name'] . "</td>".
                "<td>" . $row['last_seen'] . "</td>".
                "<td>" . $row['notes'] . "</td>".
                "<td>" . $row['watched_count'] ."</td>".
            "</tr>";
        }
    }
}