<?php


namespace App\Core\Form;

use App\Core\Model;

/**
 * Class Field
 * 
 * @author Jeevan Karki <jeevan.life195@gmail.com>
 * @package App\Core\Form
 */


class Field
{

    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';
    
    
    public string $type;
    public Model $model;
    public string $attribute;

    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf('
            <div class="form-group">
                <label>%s</label>
                <input name="%s" type="%s" placeholder="%s" value="%s" class="form-control%s">
                <div class="invalid-feedback">
                %s
                </div>

            </div>', 
            $this->model->labels()[$this->attribute],
            $this->attribute,
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->model->getFirstError($this->attribute)

        );
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
        
    }
}