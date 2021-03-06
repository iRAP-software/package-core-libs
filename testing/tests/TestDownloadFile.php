<?php

class TestDownloadFile extends AbstractTest
{
    public function getDescription(): string 
    {
        return "Test the downloadFile function works.";
    }
    
    
    public function run() 
    {
        $largeFileUrl = "http://ipv4.download.thinkbroadband.com/50MB.zip";
        $downloadedFile = \iRAP\CoreLibs\Filesystem::downloadFile($largeFileUrl);
        
        // If we didn't throw an exception we passed.
        if (filesize($downloadedFile) >= 50000000)
        {
            $this->m_passed = true;
        }
        else
        {
            $this->m_passed = false;
        }
        
        unlink($downloadedFile);
    }
}
