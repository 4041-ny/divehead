import anime from 'animejs'
var timeline = anime.timeline();

timeline
  .add({
    targets: '#elem',
    translateX: 250
  })
  .add({
    targets: '#elem2',
    translateX: 250
  })
  .add({
    targets: '#elem3',
    translateX: 250
  });