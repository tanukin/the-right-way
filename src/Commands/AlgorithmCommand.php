<?php

namespace Algorithm\Commands;

use Algorithm\Edge\Edge;
use Algorithm\Exceptions\EmptyFileException;
use Algorithm\Exceptions\FileException;
use Algorithm\Exceptions\GraphException;
use Algorithm\Exceptions\NotFoundFileException;
use Algorithm\Graph\Graph;
use Algorithm\Graph\GraphJson;
use Algorithm\GraphService;
use Algorithm\Vertices\Vertices;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AlgorithmCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:Dijkstra-algorithm')
            ->setDescription('The Dijkstra algorithm finds the shortest path from one of the vertices of the graph to all the others.')
            ->addArgument('filename', InputArgument::OPTIONAL, 'Enter filename with the extension');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            if (empty($input->getArgument('filename')))
                throw new FileException('No filename received.');

            $graphJSON = new GraphJson($this->getContent($input->getArgument('filename')));
            $graph = new Graph($graphJSON->decode());
            $edge = new Edge();
            $vertices = new Vertices($graph->countVertex());

            $algorithm = new GraphService($graph, $vertices, $edge);
            $algorithm->run();

            $this->delimiter($output, 'Input graph:', $graph->echoGraph(), 'Result:', $vertices->echoVertices());


        } catch (GraphException $e) {
            $this->delimiter($output, 'Input graph:', $graph->echoGraph(), 'ERROR! ' . $e->getMessage());
        } catch (FileException $e) {
            $this->delimiter($output, 'ERROR! ' . $e->getMessage());
        } catch (\Exception $e){
            $this->delimiter($output, $e->getMessage());
        }
    }

    /**
     * @param string $path
     *
     * @return string
     *
     * @throws NotFoundFileException
     * @throws EmptyFileException
     */
    protected function getContent(string $path): string
    {
        if (!file_exists($path))
            throw new NotFoundFileException('File ' . $path . ' not found');
        $content = file_get_contents($path);
        if (empty($content))
            throw new EmptyFileException('Content is empty');
        return $content;
    }

    /**
     * @param OutputInterface $output
     * @param array ...$args
     */
    protected function delimiter(OutputInterface $output, ...$args)
    {
        $output->writeln('--------------------------------');
        foreach ($args as $item) {
            $output->writeln($item);
            $output->writeln('--------------------------------');
        }
    }

}