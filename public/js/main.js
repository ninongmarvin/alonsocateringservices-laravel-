function homeRightHover(){
  const reasons = document.getElementById('reasons');
  reasons.classList.remove('hide');
  reasons.classList.add('show');
}

function homeRightHoverLeave(){
  const reasons = document.getElementById('reasons');
  reasons.classList.remove('show');
  reasons.classList.add('hide');
}


function aboutHover(){
  const reasons = document.getElementsByClassName('description');
  for(let i=0;i<=reasons.length;i++){
    reasons[i].classList.remove('hide-desc');
    reasons[i].classList.add('show-desc');
  }
}

function aboutHoverLeave(){
  const reasons = document.getElementsByClassName('description');
  for(let i=0;i<=reasons.length;i++){
    reasons[i].classList.remove('show-desc');
    reasons[i].classList.add('hide-desc');
  }
}

function order(){
  const order = document.getElementById('order');
  const contents = document.getElementById('contents');
  order.classList.remove('order');
  order.classList.add('expand');
  contents.classList.remove('hide');
  contents.classList.add('test');
}

function leaveOrder(){
  const order = document.getElementById('order');
  const contents = document.getElementById('contents');
  order.classList.add('order');
  order.classList.remove('expand');
  contents.classList.add('hide');
  contents.classList.remove('test');
}

function addMoreSelection(){
  const selections = document.getElementById('selections');
  const clone = selections.cloneNode(true);
  document.getElementById('add-selections').appendChild(clone);

  const menu = document.getElementsByClassName('selections');

  for(let i=0;i<=menu.length;i++){
    document.getElementById('name').setAttribute('name', 'name'+"["+i+"]");
    document.getElementById('image').setAttribute('name', 'image'+"["+i+"]");
    document.getElementById('price').setAttribute('name', 'price'+"["+i+"]");
  }
}

function openSelection(){
  const container = document.getElementById('container');
  container.classList.remove('hide');
}

function openCart(){
  const container = document.getElementById('cart-container');
  container.classList.remove('hide');
}

function openCart2(id){
  const container = document.getElementById('cart-container-'+id);
  container.classList.remove('hide');
}

function openSelection2(id){
  const container = document.getElementById('container-'+id);
  container.classList.remove('hide');
}

function openSelection(){
  const container = document.getElementById('container');
  container.classList.remove('hide');
}

function openSelection3(id){
  const container = document.getElementById('container-venues-'+id);
  container.classList.remove('hide');
}

function openSelection4(id){
  const container = document.getElementById('modal-add-type-'+id);
  container.classList.remove('hide');
}

function closeSelection(){
  const container = document.getElementById('container');
  container.classList.add('hide');
}

function closeCart(){
  const container = document.getElementById('cart-container');
  container.classList.add('hide');
}

function closeCart2(id){
  const container = document.getElementById('cart-container-'+id);
  container.classList.add('hide');
}

function closeSelection2(id){
  const container = document.getElementById('container-'+id);
  container.classList.add('hide');
}

function closeSelection3(id){
  const container = document.getElementById('container-venues-'+id);
  container.classList.add('hide');
}

function closeSelection4(id){
  const container = document.getElementById('modal-add-type-'+id);
  container.classList.add('hide');
}

function modalAddSelection(id){
  const add = document.getElementById("modal-add-selection-"+id);
  add.classList.remove('hide');
}

function modalAddSelectionClose(id){
  const add = document.getElementById("modal-add-selection-"+id);
  add.classList.add('hide');
}

function addMoreSelection2(id){
  const selections = document.getElementById('selections-'+id);
  const clone = selections.cloneNode(true);
  document.getElementById('add-selections-'+id).appendChild(clone);

  const menu = document.getElementsByClassName('selections-'+id);

  for(let i=0;i<=menu.length;i++){
    document.getElementById('name-'+id).setAttribute('name', 'name'+"["+i+"]");
    document.getElementById('image-'+id).setAttribute('name', 'image'+"["+i+"]");
    document.getElementById('price-'+id).setAttribute('name', 'price'+"["+i+"]");
  }
}

// function addMoreCities(id){
//   const selections = document.getElementById('selections2-'+id);
//   const clone = selections.cloneNode(true);
//   document.getElementById('add-selections-'+id).appendChild(clone);
//
//   const menu = document.getElementsByClassName('selections2-'+id);
//
//   for(let i=0;i<=menu.length;i++){
//     document.getElementById('location-'+id).setAttribute('name', 'name'+"["+i+"]");
//     document.getElementById('image-'+id).setAttribute('name', 'image'+"["+i+"]");
//     document.getElementById('capacity-'+id).setAttribute('name', 'capacity'+"["+i+"]");
//     document.getElementById('description-'+id).setAttribute('name', 'description'+"["+i+"]");
//   }
// }

function addMoreCities(id){
  const selections = document.getElementById('selections-'+id);
  const clone = selections.cloneNode(true);
  document.getElementById('add-selections-'+id).appendChild(clone);

  const menu = document.getElementsByClassName('selections-'+id);

  for(let i=0;i<=menu.length;i++){
    document.getElementById('location-'+id).setAttribute('name', 'location'+"["+i+"]");
    document.getElementById('image-'+id).setAttribute('name', 'image'+"["+i+"]");
    document.getElementById('capacity-'+id).setAttribute('name', 'capacity'+"["+i+"]");
    document.getElementById('description-'+id).setAttribute('name', 'description'+"["+i+"]");
  }
}

function addMoreServices(){
  const selections = document.getElementById('selections');
  const clone = selections.cloneNode(true);
  document.getElementById('add-selections').appendChild(clone);

  const menu = document.getElementsByClassName('add-services');

  for(let i=0;i<=menu.length;i++){
    document.getElementById('type').setAttribute('name', 'type'+"["+i+"]");
    document.getElementById('price').setAttribute('name', 'price'+"["+i+"]");
    document.getElementById('capacity').setAttribute('name', 'capacity'+"["+i+"]");
    document.getElementById('set_up').setAttribute('name', 'set_up'+"["+i+"]");
    document.getElementById('venue1').setAttribute('name', 'venue1'+"["+i+"]");
    document.getElementById('planner').setAttribute('name', 'planner'+"["+i+"]");
  }
}

function addMoreTypes2(id){
  const selections = document.getElementById('selections-'+id);
  const clone = selections.cloneNode(true);
  document.getElementById('add-types-'+id).appendChild(clone);

  const menu = document.getElementsByClassName('types-'+id);

  for(let i=0;i<=menu.length;i++){
    document.getElementById('type-'+id).setAttribute('name', 'type'+"["+i+"]");
    document.getElementById('price-'+id).setAttribute('name', 'price'+"["+i+"]");
    document.getElementById('capacity-'+id).setAttribute('name', 'capacity'+"["+i+"]");
    document.getElementById('set_up-'+id).setAttribute('name', 'set_up'+"["+i+"]");
    document.getElementById('venue1-'+id).setAttribute('name', 'venue1'+"["+i+"]");
    document.getElementById('planner-'+id).setAttribute('name', 'planner'+"["+i+"]");
  }
}
