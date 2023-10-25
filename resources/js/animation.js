HTML CSS JSResult Skip Results Iframe
EDIT ON
var timelineParameters = anime.timeline({
  direction: 'alternate',
  loop: true
});

timelineParameters
  .add({
    targets: '#timelineParameters .square.el',
    translateX: [ { value: 80 }, { value: 220 }, { value: 300 } ],
    translateY: [ { value: 60 }, { value: 120 }, { value: 120 } ],
    duration: 3000
  })
  .add({
    targets: '#timelineParameters .circle.el',
    translateX: [ { value: 80 }, { value: 220 }, { value: 300 } ],
    translateY: [ { value: 60 }, { value: -60 }, { value: -60 } ],
    duration: 3000,
    offset: 200
  })
  .add({
    targets: '#timelineParameters .triangle.el',
    translateX: [ { value: 80 }, { value: 300 } ],
    translateY: [ { value: -120 }, { value: -60 }, { value: -60 } ],
    duration: 3000,
    offset: 400
  });