<html>
    <head>
        <script>

            var arrHead = new Array();
            arrHead = ['Task', 'Due Date', '', '']; // table headers.

            // first create a TABLE structure by adding few headers.
            function createTable() {
                var taskTable = document.createElement('table');
                taskTable.setAttribute('id', 'taskTable');  // table id.

                var tr = taskTable.insertRow(-1);

                for (var h = 0; h < arrHead.length; h++) {
                    var th = document.createElement('th'); // the header object.
                    th.innerHTML = arrHead[h];
                    tr.appendChild(th);
                }

                var div = document.getElementById('cont');
                div.appendChild(taskTable);    // add table to a container.
            }

            // function to add new row.
            function addRow() {

                var taskTab = document.getElementById('taskTable');

                var rowCnt = taskTab.rows.length;    // get the number of rows.
                var tr = taskTab.insertRow(rowCnt); // table row.
                //tr = taskTab.insertRow(rowCnt);

                for (var c = 0; c < arrHead.length; c++) {
                    var td = document.createElement('td');          // TABLE DEFINITION.
                    td = tr.insertCell(c);

                    switch (c) {
                        case arrHead.length - 1:
                            // add a button control.
                            var button = document.createElement('input');

                            // set the attributes.
                            button.setAttribute('type', 'button');
                            button.setAttribute('value', 'Remove');

                            // add button's "onclick" event.
                            button.setAttribute('onclick', 'removeRow(this)');

                            td.appendChild(button);
                            break;
                        case arrHead.length - 2:
                            // add a button control.
                            var button = document.createElement('input');

                            // set the attributes.
                            button.setAttribute('type', 'button');
                            button.setAttribute('value', 'Edit');

                            // add button's "onclick" event.
                            button.setAttribute('onclick', 'editRow(this)');

                            td.appendChild(button);
                            break;

                        case 0:
                            var ele = document.createElement('input');
                            ele.setAttribute('type', 'text');
                            ele.setAttribute('value', document.getElementById('tname').value);
                            td.appendChild(ele);
                            break;

                        case 1:
                            var ele = document.createElement('input');
                            ele.setAttribute('type', 'text');
                            ele.setAttribute('value', document.getElementById('duedate').value);
                            td.appendChild(ele);
                            break;
                    }
                }
            }

            // function to delete a row.
            function removeRow(oButton) {
                var taskTab = document.getElementById('taskTable');
                taskTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // buttton -> td -> tr
            }


        </script>
    </head>

    <body onload="createTable()">

        <label for="taskname">Task:</label>
        <input type="text" id="tname" name="tname" value="task..."><br>


        <label for="dueDate">Due Date:</label>
        <input type="date" id="duedate" name="duedate" value="due date ..."><br>



        <p>
            <input type="button" id="addRow" value="Add New Row" onclick="addRow()" />
        </p>
        <div id="cont"></div>   <!--the container to add the table.-->


    </body>

</html>