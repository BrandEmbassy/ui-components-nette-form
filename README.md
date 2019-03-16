# UiComponents - Nette Form
Rendering of Nette Form in BrandEmbassy/UiComponets

## Installation
```bash
composer require brandembassy/ui-components-nette-form
```
## Usage

Register renerers in your `services.neon` file:
```yml
- BrandEmbassy\Components\NetteForm\NetteFormRenderer([
        BrandEmbassy\Components\NetteForm\FormField\TextInput\TextInputFieldRenderer(),
        BrandEmbassy\Components\NetteForm\FormField\TextArea\TextAreaFieldRenderer(),
        BrandEmbassy\Components\NetteForm\FormField\TextInput\LongTextInputFieldRenderer(),
        BrandEmbassy\Components\NetteForm\FormField\TextInput\TimeInputFieldRenderer(),
        BrandEmbassy\Components\NetteForm\FormField\Submit\SubmitFieldRenderer(),
        BrandEmbassy\Components\NetteForm\FormField\Hidden\HiddenInputFieldRenderer(),
        BrandEmbassy\Components\NetteForm\FormField\CheckBoxList\CheckboxListWithIconsFormFieldRenderer(),
        BrandEmbassy\Components\NetteForm\FormField\SelectBox\SelectBoxFieldRenderer(),
        BrandEmbassy\Components\NetteForm\FormField\RadioList\RadioListRenderer(),
    ])
```

And then simple use `NetteFormRender` as service to conver Nette `Form` object into `UiComponent`.
```php
$compoent = $this->netteFormRenderer->render($form);

echo $compoent->render();
```
