import anime from 'animejs'

var timeline = anime.timeline({
    direction: 'alternate',
    loop:true,
    delay:1000
});

timeline
  .add({
    targets: '#elem',
    translateX: 250
  })
  .add({
    targets: '#elem2',
    translateX: 250,
    offset:'-=600'
  })
  .add({
    targets: '#elem3',
    translateX: 250,
    offset:'-=800'
  });