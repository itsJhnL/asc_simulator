<form id="dynamicForm">
  <div id="inputContainer">
    <input type="text" id="inputField1">
  </div>
  <button id="addButton">Add Field</button>
  <input type="submit" value="Submit">
</form>

<form id="dynamicForm">
  <div id="inputContainer">
    <div class="inputWrapper">
      <input type="text" id="inputField1">
      <button class="removeButton">Remove</button>
    </div>
  </div>
  <button id="addButton">Add Field</button>
  <input type="submit" value="Submit">
</form>

<script>document.getElementById('addButton').addEventListener('click', function(event) {
  event.preventDefault();

  var inputContainer = document.getElementById('inputContainer');
  var newInput = document.createElement('input');
  newInput.type = 'text';
  newInput.id = 'inputField' + (inputContainer.children.length + 1);

  inputContainer.appendChild(newInput);</script>


  <script>
  document.getElementById('addButton').addEventListener('click', function(event) {
  event.preventDefault();

  var inputContainer = document.getElementById('inputContainer');
  var newInputWrapper = document.createElement('div');
  newInputWrapper.classList.add('inputWrapper');

  var newInput = document.createElement('input');
  newInput.type = 'text';
  newInput.id = 'inputField' + (inputContainer.children.length + 1);
  newInputWrapper.appendChild(newInput);

  var newButton = document.createElement('button');
  newButton.textContent = 'Remove';
  newButton.classList.add('removeButton');
  newButton.addEventListener('click', function(event) {
    event.preventDefault();
    event.target.parentNode.remove();
  });
  newInputWrapper.appendChild(newButton);

  inputContainer.appendChild(newInputWrapper);
});</script>