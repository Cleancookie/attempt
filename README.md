# Attempt

A simple function to attempt a function inspired by idiomatic error handling in Golang.

## Why?

I've ran into countless situations where I have to move a variable outside of a try catch just because it is in a different scope

```php
// ❌ $success is needed across difference scopes.  Also as an aside $success mutated on different lines
$success = null;
try {
    writeToFile();
    $success = true;
} catch (Exception $e) {
    $success = false;
}

if (!$success) {
    // ...
}
```

```php
// ✅ With attempt, I can write code top to bottom, saving on the whiplash
[$error, $value] = attempt(fn() => writeToFile());

$success = !$error;
```

It's also nice to just have one less layer of indentation sometimes

```php
// 1 layer of indentation 🙅
try {
    $value = someFunction();
    logger()->debug($value);
} catch (Exception $e) {
    report($e);
}
```

```php
// 0 layers of indentation 👌
[$error, $value] = attempt(fn() => someFunction());
```

## Installation

```bash
composer require cleancookie/attempt
```

And may your functions be attempted

## Usage

```php
[$error, $value] = attempt(fn() => throw new Exception('This is an exception'));

if ($error) {
    throw $error; // The reported error will still point to the original exception
}

echo $value;
```

You can also check for specific exception types:

```php
[$error, $value] = attempt(fn() => throw new Exception('This is an exception'));

if ($error instanceof \Exception) {
    throw $error;
}

echo $value;
```

You can also ignore errors if you don't care about them:

```php
[$_, $value] = attempt(fn() => throw new Exception('This is an exception'));

echo $value;
```
