var BreakException = {};

function toggleFAQ(event) {
  event.path.forEach(function (element) {
    console.log(element, element.classList);
    if (element.classList.contains('faq-container')) {
      var answerContainer = element.getElementsByClassName('faq-container__answer')[0];
      if (answerContainer.classList.contains('faq-container__answer--show')) {
        answerContainer.classList.remove('faq-container__answer--show');
      } else {
        answerContainer.classList.add('faq-container__answer--show');
      }
      throw BreakException;
    }
  });
}