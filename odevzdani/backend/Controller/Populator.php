<?php
class Populator
{   
    /*
     * funkce doplnuje na misto tokenu "$n" vygenerovane operandy. Ulohy rozlisuje podle task['code']
     * v pripade ze kod ziska kod ulohy, ktery neni osetren, nahradi toky retezcem "VAR_DEFAULT".
     */
    public function populateTask($task)
    {
        $gen = new ValueGenerator();

        if ($task['code']) $code = $task['code'];

        switch ($code)
        {
            case 'dh':
                $genVals = $gen->getDHvalues();
                $task['description'] = preg_replace(
                    ['/\$1/', '/\$2/', '/\$3/', '/\$4/'], array_slice($genVals, 0, 4), $task['description']
                );
                $task['result'] = $genVals[4];
                break;

            case 'con':
                $generatedValues = $gen->getMODvalues();
                $task['description'] = preg_replace(['/\$1/', '/\$2/'], [$generatedValues[0], $generatedValues[1]], $task['description']);
                $task['result'] = $generatedValues[2];
                break;

            case 'gcd':
                $generatedValues = $gen->getGCDvalues();
                $task['description'] = preg_replace(['/\$1/', '/\$2/'], [$generatedValues[0], $generatedValues[1]], $task['description']);
                $task['result'] = $generatedValues[2];
                break;

            case 'lcm':
                $generatedValues = $gen->getLCMvalues();
                $task['description'] = preg_replace(['/\$1/', '/\$2/'], [$generatedValues[0], $generatedValues[1]], $task['description']);
                $task['result'] = $generatedValues[2];
                break;

            case 'pr':
                $generatedValues = $gen->getPRvalues();
                $task['description'] = preg_replace('/\$1/', $generatedValues[0], $task['description']);
                $task['result'] = $generatedValues[1];
                break;

            case 'rsad':
                $generatedValues = $gen->getRSAvalues();
                $task['description'] = preg_replace(['/\$1/', '/\$2/', '/\$3/', '/\$4/'], [$generatedValues[5], $generatedValues[1], $generatedValues[2], $generatedValues[4]], $task['description']);
                $task['result'] = $generatedValues[0];
                break;

            case 'rsae':
                $generatedValues = $gen->getRSAvalues();
                $task['description'] = preg_replace(['/\$1/', '/\$2/', '/\$3/', '/\$4/'], [$generatedValues[0], $generatedValues[1], $generatedValues[2], $generatedValues[3]], $task['description']);
                $task['result'] = $generatedValues[5];
                break;
            
            default:
                $task['description'] = preg_replace('/(\$)\d+/i', 'VAR_DEFAULT',$task['description']);
                break;
        }
        return $task;
    }
}