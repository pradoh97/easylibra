let placeholderImg, coverImg, clearImg, originalPlaceholderImg;
getElements();
eventListeners();

function getElements(){
  placeholderImg = document.querySelector('.book-card.upload > img');
  originalPlaceholderImg = placeholderImg.src;
  coverImg = document.getElementById('coverImg');
  clearImg = document.getElementById('clearImg');
}

function eventListeners(){
  coverImg.addEventListener('change', changeCoverImg);
  clearImg.addEventListener('mouseup', clearCoverImg);
}

function changeCoverImg(e){
  let placeholder = e.target;
  let file = placeholder.files[0];
  let fr = new FileReader();

  //el evento load se ejecuta cuando el archivo se termina de leer.
  //en ese momento se cambia el origen de la imagen por el resultado.
  fr.addEventListener('load', () => {
    placeholderImg.src = fr.result;
  });
  fr.readAsDataURL(file);
}

function clearCoverImg(e){
  placeholderImg.src = originalPlaceholderImg;
  coverImg.value = null;
}
