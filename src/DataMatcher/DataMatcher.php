<?php

/**
 * @file
 * Contains \Drupal\rules\DataMatcher\DataMatcherInterface.
 */

namespace Drupal\rules\DataMatcher;

use Drupal\rules\DataProcessor\DataProcessorCollection;
use Drupal\rules\DataProcessor\DataProcessorInterface;

/**
 * Base abstract class for Data Matchers.
 */
abstract class DataMatcher implements DataMatcherInterface {

  /**
   * @var DataProcessorCollection
   */
  protected $subjectProcessors;

  /**
   * @var DataProcessorCollection
   */
  protected $objectProcessors;

  /**
   * @param DataProcessorCollection $subjectProcessors
   * @param DataProcessorCollection $objectProcessors
   */
  public function __construct(DataProcessorCollection $subjectProcessors, DataProcessorCollection $objectProcessors) {
    $this->subjectProcessors = $subjectProcessors;
    $this->objectProcessors = $objectProcessors;
  }

  /**
   * @param array $subjectProcessors
   * @param array $objectProcessors
   */
  public static function create(array $subjectProcessors = [], array $objectProcessors = []) {
    return new static(
      new DataProcessorCollection($subjectProcessors),
      new DataProcessorCollection($objectProcessors)
    );
  }

  /**
   * @param string $id
   * @param int $fields
   * @param DataProcessorInterface $dataProcessor
   */
  protected function addFieldsProcessor($id, $fields, DataProcessorInterface $dataProcessor) {
    if (in_array($fields, [DataMatcherInterface::FIELD_SUBJECT, DataMatcherInterface::FIELD_BOTH], TRUE)) {
        $this->subjectProcessors[] = $dataProcessor;
    }

    if (in_array($fields, [DataMatcherInterface::FIELD_OBJECT, DataMatcherInterface::FIELD_BOTH], TRUE)) {
        $this->objectProcessors[] = $dataProcessor;
    }
  }

  /**
   * @param string $id
   * @param int $fields
   * @param DataProcessorInterface $dataProcessor
   */
  protected function removeFieldsProcessor($id, $fields) {
    if (in_array($fields, [DataMatcherInterface::FIELD_SUBJECT, DataMatcherInterface::FIELD_BOTH], TRUE)) {
        if (isset($this->subjectProcessors[$id])) {
            unset($this->subjectProcessors[$id]);
        }
    }

    if (in_array($fields, [DataMatcherInterface::FIELD_OBJECT, DataMatcherInterface::FIELD_BOTH], TRUE)) {
        if (isset($this->objectProcessors[$id])) {
            unset($this->objectProcessors[$id]);
        }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function match($subject, $object) {
    return $this->doMatch(
      $this->subjectProcessors->process($subject),
      $this->objectProcessors->process($object)
    );
  }

  /**
   * Perform the actual matching.
   *
   * @param mixed $subject
   * @param mixed $object
   *
   * @return boolean
   */
  abstract protected function doMatch($subject, $object);

}
