<?php 
class NewDir extends SplFileInfo {
    public function createThumbDirectory() {
        return $this->createSubDirectory('thmbs');
    }
    public function createImageDirectory() {
        return $this->createSubDirectory('imgs');
    }
    private function createSubDirectory($name) {
        $path = $this->getPathname();
        return mkdir($path . './' . $name, 0755, true);
    }
}