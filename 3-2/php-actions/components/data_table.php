<?php
const RADIO = 0;
const CHECKBOX = 1;
const REMOVE = 0;
const EDIT = 1;
const SHOW = 3;
class data_table
{
    public array $tableRows;
    public array $tableData;
    public array $tableHead = [];
    public array $tableBody = [];
    public int $columnCount = 0;

    public function __construct($tableData)
    {
        $this->tableRows = $tableData;
        foreach ($tableData as $row) {
            $currentRow = [];
            $currentRow[] = "<tr>";
            foreach ($row as $td) {
                $this->columnCount = count($row);
                $currentRow[] = '<td>' . $td . '</td>';
            }
            $currentRow[] = "</tr>";
            $this->tableBody[] = $currentRow;
        }
    }

    public function head(array $head)
    {
        $this->tableHead[] = "<thead>";
        foreach ($head as $td) {
            $this->tableHead[] .= "<td>$td</td>";
        }
        $this->tableHead[] = "</thead>";
    }

    public function check($title, $type = CHECKBOX)
    {
        // Insert new table data to $tableHeader for checkbox column
        array_splice($this->tableHead, $this->columnCount + 1, 0, "<td>$title</td>");

        switch ($type) {
            case CHECKBOX:
            {
                $icon = 'fas fa-check';
                $class = 'checkbox';
                break;
            }

            case RADIO:
            {
                $icon = 'fas fa-dot-circle';
                $class = 'radio';
                break;
            }
        }

        for ($c = 0; $c < count($this->tableBody); $c++) {
            $check = "
            <td>
                <div class='check-parent h-1'>
                    <input type='$class' class='form-control form-control-check' name='gender'
                           id='male-gender' value='1'>
                    <div class='check-background $class'>
                        <i class='$icon'></i>
                    </div>
                    <div class='check-ripple'></div>
                </div>
            </td>";
            array_splice($this->tableBody[$c], $this->columnCount + 1, 0, $check);
        }
        $this->columnCount++;
    }

    public
    function action($title, $type)
    {
        array_splice($this->tableHead, $this->columnCount + 1, 0, "<td>$title</td>");

        switch ($type) {
            case REMOVE:
            {
                $icon = 'fas fa-trash-alt';
                break;
            }
            case EDIT:
            {
                $icon = 'fas fa-edit';
                break;
            }
            case SHOW:
            {
                $icon = 'far fa-eye';
                break;
            }
        }

        for ($c = 0; $c < count($this->tableBody); $c++) {
            $check = "
            <td>
                 <a href='login.php'>
                    <i class='$icon'></i>
                 </a>
            </td>";
            array_splice($this->tableBody[$c], $this->columnCount + 1, 0, $check);
        }
    }

    public
    function add()
    {
        $body = "";
        foreach ($this->tableBody as $row) {
            $body .= implode("", $row);
        }
        $head = implode("", $this->tableHead);
        echo("<table>" . $head . $body . "</table>");
    }
}