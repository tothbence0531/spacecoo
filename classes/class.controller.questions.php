<?php

class QuestionsController extends Questions {

  private $questionBody;
  private $correctAnswer;
  private $wrongAnswers;
  private $testId;

  /**
   * Second constructor with option to pass only testId and nothing else
   * NOTE: to call use QuestionsController::constructWithTestIdOnly(params)
   */
  public static function constructWithTestIdOnly($testId) {
    $instance = new self(null, null, null, $testId);
    
    return $instance;
  }

  public function __construct($questionBody, $correctAnswer, $wrongAnswers, $testId) {
    $this->questionBody = $questionBody;
    $this->correctAnswer = $correctAnswer;
    $this->wrongAnswers = $wrongAnswers;
    $this->testId = $testId;
  }

  public function addQuestion() {
    $this->setQuestion($this->questionBody, $this->correctAnswer, $this->wrongAnswers, $this->testId);
  }

  public function getAllQuestionsByTestId() {

    $questions = $this->getQuestions($this->testId);

    $questionsAssoc = [];

    foreach ($questions as $row) {
      if (!isset($questionsAssoc[$row['q_id']])) {
          $questionsAssoc[$row['q_id']] = [
              'q_body' => $row['q_body'],
              'correct_answer' => $row['correct_answer'],
              'wrong_answers' => []
          ];
      }
  
      if (!empty($row['wrong_answer'])) {
          $questionsAssoc[$row['q_id']]['wrong_answers'][] = $row['wrong_answer'];
      }
    }

    return $questionsAssoc;
  }

}