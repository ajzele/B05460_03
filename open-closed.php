<?php

interface ExporterInterface {
    public function export($data);
}

class CsvExporter implements ExporterInterface {
    public function export($data) {
        // Implementation...
    }
}

class XmlExporter implements ExporterInterface {
    public function export($data) {
        // Implementation...
    }
}

class YamlExporter implements ExporterInterface {
    public function export($data) {
        // Implementation...
    }
}

class ExporterFactory {
    public function buildForFormat($format) {
        if ('csv' === $format) {
            return new CsvExporter();
        } elseif ('xml' === $format) {
            return new XmlExporter();
        } elseif ('yaml' === $format) {
            return new YamlExporter();
        }

        throw new \Exception('Unknown export format!');
    }
}

class GenericExporter {
    private $exporterFactory;

    public function __construct(ExporterFactory $exporterFactory) {
        $this->exporterFactory = $exporterFactory;
    }

    public function exportToFormat($data, $format) {
        $exporter = $this->exporterFactory->buildForFormat($format);
        return $exporter->export($data);
    }
}
