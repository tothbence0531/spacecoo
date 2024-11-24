<?php

class AnswersController extends Answers {
  private $submissionId;
  private $questionId;

  public function __construct($submissionId, $questionId) {
    $this->submissionId = $submissionId;
    $this->questionId = $questionId;
  }

  public function getAnswer() {
    return $this->getAnswerBySubmissionAndQuestionId($this->submissionId, $this->questionId);
  }
}