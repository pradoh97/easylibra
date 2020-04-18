let books, editClicked;
getBooks();
addListeners();

function changeCoverImg(e){
  let placeholder;
  let placeholderImg;

  //For images on gallery
  if(e.target.parentElement.classList.contains('book-card')){
    placeholder = document.getElementById(e.target.id);
    placeholderImg = e.target.parentElement.querySelector('img');
  }
  //For images on book upload
  else {
    placeholder = e.target;
    placeholderImg = document.querySelector('img');
  }
  let file = placeholder.files[0];
  let fr = new FileReader();

  //el evento load se ejecuta cuando el archivo se termina de leer.
  //en ese momento se cambia el origen de la imagen por el resultado.
  fr.addEventListener('load', () => {
    placeholderImg.src = fr.result;
    removeEditButton(placeholderImg.parentElement, e.target.previousElementSibling, e.target);
  });
  fr.readAsDataURL(file);
}

function addListeners(){
  for(book of books){
    book.addEventListener('mouseover', addOptions);
    book.addEventListener('mouseout', removeOptions);
  }
}

function addEditButton(element){
  let fileInput = document.createElement('input');
  let edit = document.createElement('label');
  let bookName = element.querySelector('h2').innerText;

  fileInput.type = 'file';
  fileInput.id = bookName;
  edit.innerText = 'Edit';
  edit.htmlFor = bookName;

  edit.classList.add('option');
  fileInput.addEventListener('change', changeCoverImg);

  element.appendChild(edit);
  element.appendChild(fileInput);
}

function toggleBlackedImage(image){
  if(image.classList.contains('blacked')){
    image.classList.remove('blacked');
  } else {
    image.classList.add('blacked');
  }
}

function addOptions(e){
  let image;

  if(e.target.localName == 'img'){
    image = e.target;
  }

  let parent = image.parentElement;

  //Search for existing Edit button.
  for(element of parent.children){
    if(element.classList.contains('option')){
      return;
    }
  }

  toggleBlackedImage(image);
  addEditButton(parent);
}

function removeEditButton(parent, editButton, fileInput){
  parent.removeChild(editButton);
  parent.removeChild(fileInput);
  parent.querySelector('img').classList.remove('blacked');
}

function removeOptions(e){
  //The edit option
  let option = e.target.parentElement.querySelector('.option');
  let input = option.parentElement.querySelector('input');
  //Do not remove edit option if moved from img to edit span element.
  //Firefox
  if(e.relatedTarget && e.relatedTarget == option){
    return;
  }
  //Chrome
  else if(e.toElement && e.toElement == option){
    return;
  }

  removeEditButton(option.parentElement, option, input)
}

function getBooks(){
  if(!books){
    books = document.querySelectorAll('.book-card img');
  } else {
    return;
  }
}
