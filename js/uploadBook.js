let placeholderImg, coverImg, clearImg, originalPlaceholderImg;
getElements();
eventListeners();

function getElements(){
  placeholderImg = document.querySelector('.book-card.upload > img');
  originalPlaceholderImg = placeholderImg.src;
  coverImg = document.getElementById('coverImg');
  clearImg = document.getElementById('clearImg');

  //Removes events listeners from book grid.
  book.removeEventListener('mouseover', addOptions);
  book.removeEventListener('mouseout', removeOptions);
}

function eventListeners(){
  coverImg.addEventListener('change', changeCoverImg);
  clearImg.addEventListener('mouseup', clearCoverImg);
}

function clearCoverImg(e){
  placeholderImg.src = originalPlaceholderImg;
  coverImg.value = null;
}
