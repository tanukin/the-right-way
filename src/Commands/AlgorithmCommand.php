<?php

namespace Algorithm\Commands;

use Algorithm\Core\ControllerFactory;
use Algorithm\Core\Edge;
use Algorithm\Core\GraphJson;
use Algorithm\Core\ResponseBuilder;
use Algorithm\Core\Vertices;
use Algorithm\Entities\Graph;
use Algorithm\Exceptions\EmptyFileException;
use Algorithm\Exceptions\FileException;
use Algorithm\Exceptions\GraphException;
use Algorithm\Exceptions\NotFoundFileException;
use Algorithm\Services\GraphService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AlgorithmCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:Dijkstra-algorithm')
            ->setDescription(
                'The Dijkstra algorithm finds the shortest path'.
                'from one of the vertices of the graph to all the others.'
            )
            ->addArgument(
                'filename',
                InputArgument::OPTIONAL,
                'Enter filename with the extension'
            );
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        try {
            if (empty($input->getArgument('filename'))) {
                throw new FileException('No filename received.');
            }

            $graphJson = new GraphJson();
            $graphArray = $graphJson->decode(
                $this->getContent($input->getArgument('filename'))
            );

            $controllerFactory = new ControllerFactory();
            $controller = $controllerFactory->getController(
                new GraphService(),
                new ResponseBuilder()
            );

            $response = $controller->execute(
                new Graph($graphArray),
                new Vertices(count($graphArray)),
                new Edge()
            );

        } catch (GraphException $e) {
            $io->error(sprintf('ERROR! %s', $e->getMessage()));
        } catch (FileException $e) {
            $io->error(sprintf('ERROR! %s', $e->getMessage()));
        } catch (\Exception $e) {
            $io->error(sprintf('ERROR! %s', $e->getMessage()));
        }

        $io->text("Input graph");
        $io->table([], $graphArray);
        $io->text("Result");
        $io->text($response->getResponse());
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
        if (!file_exists($path)) {
            throw new NotFoundFileException('File ' . $path . ' not found');
        }
        $content = file_get_contents($path);
        if (empty($content)) {
            throw new EmptyFileException('Content is empty');
        }
        return $content;
    }
}