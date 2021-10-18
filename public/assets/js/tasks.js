let remove = document.querySelector('.draggable-div');
let dragged=0;
let dropped=0;

let dragSrcEl = null;

function dragStart(e) {
  this.style.opacity = '0.4';
  dragSrcEl = this;
  e.dataTransfer.effectAllowed = 'move';
  e.dataTransfer.setData('text/html', this.innerHTML);
};

function dragEnter(e) {
  this.classList.add('over');
}

function dragLeave(e) {
  e.stopPropagation();
  this.classList.remove('over');
}

function dragOver(e) {
  e.preventDefault();
  e.dataTransfer.dropEffect = 'move';
  return false;
}

function dragDrop(e) {
  if (dragSrcEl != this) {
      dragSrcEl.innerHTML = this.innerHTML;
      dropped=$(this.innerHTML).children('input[name=replaced_id]').val();
      dragged=$(e.dataTransfer.getData('text/html')).children('input[name=replaced_id]').val();
      this.innerHTML = e.dataTransfer.getData('text/html');
      updateDrags(dragged,dropped);
  }
  return false;
}


function dragEnd(e) {
  let listItens = document.querySelectorAll('.draggable');
  [].forEach.call(listItens, function(item) {
    item.classList.remove('over');
  });
  this.style.opacity = '1';
}

// ALL EVENTS ON DRAGGED OBJECTS
function addEventsDragAndDrop(el) {
  el.addEventListener('dragstart', dragStart, false);
  el.addEventListener('dragenter', dragEnter, false);
  el.addEventListener('dragover', dragOver, false);
  el.addEventListener('dragleave', dragLeave, false);
  el.addEventListener('drop', dragDrop, false);
  el.addEventListener('dragend', dragEnd, false);   
}

let listItens = document.querySelectorAll('.draggable-div');
[].forEach.call(listItens, function(item) {
  addEventsDragAndDrop(item);
});
