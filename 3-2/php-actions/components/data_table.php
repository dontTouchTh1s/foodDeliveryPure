<?php
const TABLE_RADIO = 0;
const TABLE_CHECKBOX = 1;
const TABLE_REMOVE = 0;
const TABLE_EDIT = 1;
const TABLE_SHOW = 3;
class data_table
{
    public array $tableRows;
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

    public function check($title, $type = TABLE_CHECKBOX)
    {
        // Insert new table data to $tableHeader for checkbox column
        array_splice($this->tableHead, $this->columnCount + 1, 0, "<td>$title</td>");

        switch ($type) {
            case TABLE_CHECKBOX:
            {
                $icon = 'fas fa-check';
                $class = 'checkbox';
                break;
            }

            case TABLE_RADIO:
            {
                $icon = 'fas fa-dot-circle';
                $class = 'radio';
                break;
            }
            default:
            {
                $ms = new message_box(MESSAGEBOX_TYPE_ERROR, "Invalid argument");
                $ms->description("Please enter a valid argument table check (TABLE_CHECKBOX, TABLE_RADIO");
                $ms->add();
                return;
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

    public function action($title, $type)
    {
        switch ($type) {
            case TABLE_REMOVE:
            {
                $icon = 'fas fa-trash-alt';
                break;
            }
            case TABLE_EDIT:
            {
                $icon = 'fas fa-edit';
                break;
            }
            case TABLE_SHOW:
            {
                $icon = 'far fa-eye';
                break;
            }
            default:
            {
                $ms = new message_box(MESSAGEBOX_TYPE_ERROR, "Invalid argument");
                $ms->description("Please enter a valid argument for table action type (TABLE_REMOVE, TABLE_EDIT, TABLE_SHOW)");
                $ms->add();
                return;
            }
        }

        array_splice($this->tableHead, $this->columnCount + 1, 0, "<td>$title</td>");
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